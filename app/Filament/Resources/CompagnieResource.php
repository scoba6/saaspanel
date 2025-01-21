<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Compagnie;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompagnieResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompagnieResource\RelationManagers;

class CompagnieResource extends Resource
{
    protected static ?string $model = Compagnie::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES GENERAUX';
    protected static ?string $navigationLabel = 'Compagnies';
    protected static ?string $recordTitleAttribute = 'libcie';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('codcie')->required()->label('CODE CIE')->unique(ignoreRecord: true),
                TextInput::make('libcie')->required()->label('LIBELLE CIE')->unique(ignoreRecord: true),
                RichEditor::make('adrcie')->label('ADRESSE CIE')->unique(ignoreRecord: true)->columnSpanFull(),
                FileUpload::make('logcie')->label('LOGO CIE')
                    ->image()
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public')
                    ->directory('cies')
                    ->columnSpan('full'),
                Toggle::make('mandat')->label('MANDAT')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codcie')->label('CODE CIE')->searchable()->sortable(),
                TextColumn::make('libcie')->label('LIBELLE CIE')->searchable()->sortable(),
                ImageColumn::make('logcie')->label('LOGO CIE')
                    ->square(),
                IconColumn::make('mandat')->label('MANDAT')->boolean(),
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
            'index' => Pages\ListCompagnies::route('/'),
            'create' => Pages\CreateCompagnie::route('/create'),
            'edit' => Pages\EditCompagnie::route('/{record}/edit'),
        ];
    }
}
