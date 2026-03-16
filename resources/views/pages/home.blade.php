@extends('layouts.app')

@section('content')
    @include('pages.home.sections.hero', ['slides' => $home['slides']])
    @include('pages.home.sections.intro', ['facts' => $home['facts']])
    @include('pages.home.sections.strategy')
    @include('pages.home.sections.guarantees', ['guarantees' => $home['guarantees']])
    @include('pages.home.sections.features_market', ['features' => $home['features'], 'deposits' => $home['deposits'], 'withdrawals' => $home['withdrawals'], 'activitySummary' => $home['activity_summary']])
    @include('pages.home.sections.testimonials_plans', ['testimonials' => $home['testimonials'], 'plans' => $home['plans']])
    @include('pages.home.sections.products', ['products' => $home['products']])
@endsection
