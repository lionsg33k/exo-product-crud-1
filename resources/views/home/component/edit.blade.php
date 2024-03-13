<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product{{ $product->id }}">
    edit
</button>

<!-- Modal -->
{{-- hanta a saad bdel had id b naffs dakchi li ktbti f data-bs-target --}}
<div class="modal fade" id="product{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="flex  flex-col px-3 gap-y-5 mt-4  w-100" action="{{ route("home.update",$product) }}" method="post">
                    @csrf
                    @method("PUT")
                    <input value="{{ old("name",$product->name) }}" class="py-1 px-2 rounded-xl text-center" type="text" name="name" placeholder="name">
                    <input value="{{ old("price",$product->price) }}" class="py-1 px-2 rounded-xl text-center" type="number" name="price" placeholder="price">
                    <input value="{{ old("stock",$product->stock) }}" class="py-1 px-2 rounded-xl text-center" type="number" name="stock" placeholder="stock">
                    <div class="flex items-center  justify-around">
                        <label  for=""> male</label>
                        <input {{ $product->type == "male" ? "checked" : "" }} type="radio" value="male" name="type">
                        <label for=""> female</label>
                        <input {{ $product->type == "female" ? "checked" : "" }} type="radio" value="female" name="type">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
        
                </form>
    
            </div>
        </div>
    </div>
</div>
