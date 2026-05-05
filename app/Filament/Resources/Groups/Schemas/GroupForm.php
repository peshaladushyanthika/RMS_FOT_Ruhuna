<?php

namespace App\Filament\Resources\Groups\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Group;
use App\Models\Supervisor;

class GroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_name')
                    ->required(),
                TextInput::make('research_title')
                    ->required()
                    ->live(onBlur: true)
                    ->helperText(function ($state, $record){
                        if(!$state){
                            return null;
                        }
                        $query = Group::query()->where('research_title', 'LIKE', '%' .$state . '%');
                        if($record){
                            $query->where('id', '!=', $record->id);
                        }
                        // ->orWhere('research_title', 'LIKE', '%' . explode(' ', $state)[0] . '%')
                        $similarTopics = $query
                        ->limit(5)
                        ->pluck('research_title')
                        ->toArray();

                        if(empty($similarTopics)){
                            return 'No similar previous topics found';
                        }
                        return 'Similar topics found:' .implode('   |   ', $similarTopics);;
                    }),
                Select::make('supervisor_id')
                    ->label('Main Supervisor')
                    ->options(
                        Supervisor::with('user')
                        ->get()
                        ->pluck('user.name', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('co_supervisor_id')
                    ->label('Co-Supervisor')
                    // ->relationship('coSupervisor', 'name')
                    ->options(
                        Supervisor::with('user')
                        ->get()
                        ->pluck('user.name', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->rule('different:supervisor_id'),
            ]);
    }
}
