<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

use App\Models\SubmissionSchedule;
use App\Models\Submission;
use Filament\Notifications\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionDetails extends Page implements HasForms
{
    use InteractsWithForms;

    // protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document';

    protected string $view = 'filament.student.pages.submission-details';

    protected static bool $shouldRegisterNavigation = false;

    public ?SubmissionSchedule $schedule = null;

    public ?array $data = [];

    public function mount(Request $request): void
    {
        $scheduleId = $request->query('schedule');

        $this->schedule =
            SubmissionSchedule::findOrFail($scheduleId);

        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            Forms\Components\FileUpload::make('file_path')
                ->label('Upload Submission')
                ->directory('submissions')
                ->required(),
        ])
        ->statePath('data');
    }

    public function submit(): void
    {
        
        $file = collect($this->data['file_path'])->first();

    $path = $file->store('submissions', 'public');
     $student = Auth::user()->student;

        Submission::create([
            'submission_schedule_id' => $this->schedule->id,

            'group_id' => $student->group_id,

            'file_path' => $path,

            'submitted_at' => now(),
        ]);

        Notification::make()
    ->title('Success')
    ->body('Submission uploaded successfully.')
    ->success()
    ->send();
    }
}