@foreach($products->get() as $prod)
    <div class="p-4 rounded border border-gray-400 shadow mb-2">
        <div class="text-2xl">{{$prod->name}}</div>
        <div class="italic text-gray-300 py-3">{{$prod->description}}</div>
        <div class="text-4xl text-red-700 font-bold text-right">{{$prod->price}}</div>
    </div>
@endforeach

<div hx-swap-oob="true" id="addProductMessage">
    <div class="bg-green-200 text-green-800 p-2 rounded">
        The product has been added successfully!!
    </div>
</div>