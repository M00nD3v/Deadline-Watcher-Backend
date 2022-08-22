<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LvaResource\Pages;
use App\Filament\Resources\LvaResource\RelationManagers;
use App\Models\Lva;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LvaResource extends Resource
{
    protected static ?string $model = Lva::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
	
	protected static ?string $modelLabel = 'LVA';
	protected static ?string $pluralModelLabel = 'LVAs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Card::make()
					->schema([
						TextInput::make('abbreviation')->label('Abkürzung')->required(),
						TextInput::make('name')->label('Bezeichnung')->required()
					])
					->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				TextColumn::make('abbreviation')->label('Abkürzung')->sortable(),
                TextColumn::make('name')->label('Bezeichnung')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLvas::route('/'),
            'create' => Pages\CreateLva::route('/create'),
            'view' => Pages\ViewLva::route('/{record}'),
            'edit' => Pages\EditLva::route('/{record}/edit'),
        ];
    }    
}
