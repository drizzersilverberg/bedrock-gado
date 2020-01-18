@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @php
        $ingredients = carbon_get_the_post_meta('crb_fp_ingredients');
        $howToCook = carbon_get_the_post_meta('crb_fp_how_to_cook');
        // dd($ingredients, $howToCook);
    @endphp

    <h2>Ingredients</h2>
    <ul>
        @foreach ($ingredients as $ingredient)
            <li>{{ $ingredient['qty_mass'] ?? '' }} {{ $ingredient['name'] ?? '' }}</li>
        @endforeach
    </ul>

    <h2>How to cook</h2>
    <ol>
        @foreach ($howToCook as $instruction)
            <li>{{ $instruction['instruction'] ?? '' }}</li>
        @endforeach
    </ol>
  @endwhile
@endsection
