<?php

namespace App\Filament\Resources\PresentationPanels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TimePicker;
use App\Models\Supervisor;
use App\Models\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;

class PresentationPanelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                            ->required(),
                DatePicker::make('presentation_date'),
                TextInput::make('location'),
                Select::make('supervisors')
                        ->label('Panel Members')
                        ->multiple()
                        ->relationship('supervisors')
                        ->getOptionLabelFromRecordUsing(
                            fn (Supervisor $record) => $record->user->name
                        )
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                 Section::make('Presentation Groups')
                    ->schema(function (Get $get) {

                        $supervisorIds = $get('supervisors') ?? [];

                        if (empty($supervisorIds)) {
                            return [
                                Placeholder::make('no_groups')
                                    ->content('Select panel members to display their groups.')
                            ];
                        }

                        $groups = Group::with('supervisor.user')
                            ->whereIn('supervisor_id', $supervisorIds)
                            ->get();

                        if ($groups->isEmpty()) {
                            return [
                                Placeholder::make('no_groups')
                                    ->content('No groups found for the selected panel members.')
                            ];
                        }

                        return $groups->flatMap(function ($group) {

                            return [
                            
                                // TextInput::make('id')
                                //     ->label('Group')
                                //     ->default($group->group_name)
                                //     ->disabled()
                                //     ->dehydrated(false),

                                Placeholder::make("group_{$group->id}"),
            // ->label('Group')
            // ->content($group->group_name),

                                // TextInput::make(
                                //     "schedule.{$group->id}.supervisor"
                                // )
                                //     ->label('Supervisor')
                                //     ->default($group->supervisor->user->name)
                                //     ->disabled()
                                //     ->dehydrated(false),

                                TimePicker::make(
                                    "schedule.{$group->id}.start_time"
                                )
                                    ->label('Start Time')
                                    ->seconds(false),

                                TimePicker::make(
                                    "schedule.{$group->id}.end_time"
                                )
                                    ->label('End Time')
                                    ->seconds(false),
                            ];
                        })->all();
                    })
                    ->columns(3)
                    ->columnSpanFull(),

            ]);
    }
}
