<?php

declare(strict_types=1);
<<<<<<< HEAD

?>
@extends('adm_theme::layouts.app')
@section('content')
    <livewire:schedule.crud />
=======
?>
@extends('adm_theme::layouts.app')
@section('content')
    @livewire(\Modules\Job\Filament\Widgets\ScheduleCrudWidget::class)
>>>>>>> laraxot/dev
@endsection
