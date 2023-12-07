@extends('frontend.template.index')


@section('content')



@livewire('frontend.account.profile', ['custnum' => auth()->guard('customer')->user()->customer_number])

@endsection