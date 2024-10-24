<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactoResource\Pages;
use App\Filament\Resources\ContactoResource\RelationManagers;
use App\Models\Contacto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\{TextInput, Textarea, Select, DatePicker,Toggle, RichEditor}; 

class ContactoResource extends Resource
{
    protected static ?string $model = Contacto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form


            ->schema([
               
                TextInput::make('nombre')
                        ->required()
                        ->label('Nombre'),
                TextInput::make('telefono1')
                         ->label('telefono1'),

                TextInput::make('telefono2')
                         ->label('telefono2'),
                
                TextInput::make('email1')
                         ->label('email1'),
                               
                TextInput::make('email2')
                         ->label('email2'),
                
                TextInput::make('direccion')
                         ->label('direccion'),
                


        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
        TextColumn::make('nombre')->label('Nombre'),
        TextColumn::make('telefono1')->label('Telefono1'),
        TextColumn::make('telefono2')->label('telefono2'),
        
        TextColumn::make('email1')->label('email1'),
                       
        TextColumn::make('email2')->label('email2'),
        
        TextColumn::make('direccion')->label('direccion'),            ])
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
            'index' => Pages\ListContactos::route('/'),
            'create' => Pages\CreateContacto::route('/create'),
            'edit' => Pages\EditContacto::route('/{record}/edit'),
        ];
    }
}
