<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntryResource\Pages;
use App\Filament\Resources\EntryResource\RelationManagers;
use App\Models\Entry;
use App\Models\Lva;
use App\Tables\Columns\externalLink;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntryResource extends Resource
{
    protected static ?string $model = Entry::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				// Select::make('lva_id')
    			// 	->relationship('lva', 'name')
				// 	->label('LVA')
				// 	->searchable(),
                Select::make('lva_id')
					->label('LVA')
					->options(Lva::all()->pluck('name_long', 'id'))
					->searchable()
					->required(),
				DateTimePicker::make('deadline')
					->displayFormat('d.m.Y H:i:s')
					->minDate(now())
					->weekStartsOnMonday()
					->default(now()->nextWeekday()->setTime(12, 0))
					->required(),
				TextInput::make('title')
					->maxLength(100)
					->datalist([
						'Abgabe',
						'Abgabegespräch',
						'Nachtragstest',
						'TUWEL-Test',
					])
					->required(),
				TextInput::make('url')
					->url()
					->maxLength(512)
					->placeholder('https://tiss.tuwien.ac.at')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lva.abbreviation')
					->sortable()
					->label('LVA'),
				TextColumn::make('title')
					->sortable()
					->label('Titel'),
				TextColumn::make('deadline')
					->sortable()
					->dateTime('d.m.Y H:i:s'),
				externalLink::make('url')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEntries::route('/')
        ];
    }    
}
