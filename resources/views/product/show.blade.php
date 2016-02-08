<h1>{{$product->name}}</h1>
@can('update', $product)
    <a href="">Você pode editar o produto</a>
@endcan
