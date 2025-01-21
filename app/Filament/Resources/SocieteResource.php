<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Societe;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\SocieteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SocieteResource\RelationManagers;

class SocieteResource extends Resource
{
    protected static ?string $model = Societe::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES GENERAUX';
    protected static ?string $navigationLabel = 'Société';
    protected static ?string $recordTitleAttribute = 'libste';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libste')->label('RAISON SOCIALE')->columnSpanFull()
                    ->autocapitalize('words')
                    ->required(),
                TextInput::make('nifste')->label('NIF')
                    ->required(),
                TextInput::make('agrste')->label('AGREMENT')
                    ->required(),
                RichEditor::make('adrste')->label('ADRESSE')->columnSpanFull(),
                FileUpload::make('logste')->label('LOGO STE')
                    ->required()
                    ->image()
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public')
                    ->directory('ste')
                    ->columnSpan('full'),
                TextInput::make('telste') ->label('Téléphone')
                    ->tel(),
                TextInput::make('webste')->label('Site Web')
                    ->prefix('https://')
                    ->suffixIcon('heroicon-m-globe-alt'),
                Toggle::make('active')->label('ACTIF')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('libste'),
                TextEntry::make('webste')
                    ->columnSpanFull(),
                TextEntry::make('webste')
                    ->label('URL')
                    ->columnSpanFull()
                    ->url(fn (Societe $record): string => '#' . urlencode($record->webste)),
                ImageEntry::make('logste'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('logste')
                        ->height('80%')
                        ->width('80%'),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('libste')
                            ->weight(FontWeight::Bold),
                        Tables\Columns\TextColumn::make('webste')
                            ->formatStateUsing(fn (string $state): string => str($state)->after('://')->ltrim('www.')->trim('/'))
                            ->color('gray')
                            ->limit(30),
                    ]),
                ])->space(3),
                Tables\Columns\Layout\Panel::make([
                    Tables\Columns\Layout\Split::make([
                        Tables\Columns\TextColumn::make('telste')
                            ->grow(false),
                        Tables\Columns\TextColumn::make('adrste')
                            ->color('gray'),
                    ]),
                ])->collapsible(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocietes::route('/'),
            'create' => Pages\CreateSociete::route('/create'),
            'edit' => Pages\EditSociete::route('/{record}/edit'),
        ];
    }
}
