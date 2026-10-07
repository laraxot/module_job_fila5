<?php

declare(strict_types=1);
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
?>
@extends('adm_theme::layouts.app')
@section('content')
    <br /><br />
<<<<<<< HEAD
    <livewire:job.status></livewire:job.status>

    <br /><br />
    <livewire:schedule.status></livewire:schedule.status>
=======
    @livewire(\Modules\Job\Filament\Widgets\JobStatusWidget::class)

    <br /><br />
    @livewire(\Modules\Job\Filament\Widgets\ScheduleStatusWidget::class)
>>>>>>> laraxot/dev
@endsection
