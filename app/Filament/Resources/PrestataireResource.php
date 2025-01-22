<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Prestataire;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\Tables\PhoneColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use App\Filament\Resources\PrestataireResource\Pages;
use App\Filament\Resources\PrestataireResource\RelationManagers;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class PrestataireResource extends Resource
{
    protected static ?string $model = Prestataire::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES SANTE';
    protected static ?string $navigationLabel = 'Prestataires';
    protected static ?string $recordTitleAttribute = 'rsnpre';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('rsnpre')
                    ->label('Raison sociale')
                    ->columnSpanFull()
                    ->required(),
                PhoneInput::make('telpre')
                    ->defaultCountry('GA')
                    ->nationalMode(true)
                    ->label('Téléphone')
                    ->required(),
                TextInput::make('mailpre')
                    ->label('Email'),
                Textarea::make('adrpre')
                    ->label('Adresse')
                    ->columnSpanFull(),
               TextInput::make('vilpre')
                    ->label('Ville')
                    ->required(),
                Country::make('paypre')
                    ->label('Pays')
                    ->required(),
                Toggle::make('active')->label('ACTIF')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rsnpre')
                    ->label('Raison sociale')
                    ->searchable()
                    ->sortable(),
                PhoneColumn::make('telpre')
                    ->displayFormat(PhoneInputNumberType::NATIONAL)
                    ->label('Téléphone')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mailpre')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('adrpre')
                    ->label('Adresse')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('vilpre')
                    ->label('Ville')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('paypre')
                    ->label('Pays')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('active')->boolean()
                    ->label('Actif')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePrestataires::route('/'),
        ];
    }
}
