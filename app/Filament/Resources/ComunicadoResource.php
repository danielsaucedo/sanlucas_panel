<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunicadoResource\Pages;
use App\Filament\Resources\ComunicadoResource\RelationManagers;
use App\Models\Comunicado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\{TextInput, Textarea, Select, DatePicker,Toggle, RichEditor}; 


class ComunicadoResource extends Resource
{
    protected static ?string $model = Comunicado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                ->required()
                ->label('Titulo'),
                TextInput::make('orden')
                ->label('Orden')
                ->numeric()  
                ->required(),
               RichEditor::make('contenido')
                ->required()
                ->label('Contenido'),
                Toggle::make('activo')
                ->label('Visible'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->label('Título'),
            BooleanColumn::make('activo')->label('Publicado'),
            TextColumn::make('created_at')->label('Creado el'),
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
            'index' => Pages\ListComunicados::route('/'),
            'create' => Pages\CreateComunicado::route('/create'),
            'edit' => Pages\EditComunicado::route('/{record}/edit'),
        ];
    }
}
