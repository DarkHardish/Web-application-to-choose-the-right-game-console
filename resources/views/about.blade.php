@extends('layouts.default')
@section('page-content')
    <section class="py-20 min-h screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h2 class="text-6xl text-center mb-6">About</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">Who is Huan Pikula?</h3>
            <p class="mb-3">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore modi ducimus ut dignissimos cupiditate quaerat numquam, ullam cum laboriosam officia impedit non ad vitae eum quisquam ea incidunt sit quos! Dolorum odit iste totam dignissimos. Eius eligendi vel, reiciendis autem consequuntur accusamus, nam perferendis non quia sint, facere maiores quidem.
            </p>
            <p class="mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, voluptatibus modi neque voluptate itaque quis quibusdam deleniti animi libero dignissimos voluptatem vitae nulla officiis vero.
            </p>
            <div class="mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quasi quaerat atque illo excepturi animi asperiores praesentium. Illo magni quis accusamus quidem, accusantium aliquam consequatur tempore excepturi recusandae velit expedita?
            </div>
            <div class="text-center">
                <a href="{{ route('dom') }}" class="inline-block bg-pink-500 text-center py-2 px-2 rounded">Go Home</a>
            </div>
        </div>
    </section>
@endsection