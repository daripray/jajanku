<div class="mt-2">
    <div class="mb-3 row justify-content-between">
        <div class="col-6">
            <h1>Sales</h1>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-create" title="Create" wire:click="create()" ><i class="bi bi-plus"></i></button>
        </div>
    </div>

    @if($isOpen)
{{--        @include('livewire.sales.modal')--}}
    @endif

	@if (session()->has('message_'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif

{{--    {{dd($data_sales)}}--}}
    <!-- Tampilkan data menggunakan card dengan infinite scroll -->
    @foreach($data_sales as $sale)
        <div class="card mb-4 shadow">
			<div class="card-header text-center">
                 <h5 class="card-title text-{{ $sale->paidoff ? 'success' : 'warning'}}">{{ $sale->date }} {{$sale->outlet->name}}</h5> 
                 <cite class="text-secondary opacity-50">{{ $sale->paidoff ? '' : 'Belum Lunas.'}}</cite> 
            </div>
{{--            <div class="card-body {{ $sale->paidoff && sizeof($sale->outlet->sales) ? 'collapse show' : 'collapse' }}" id="collapse_{{ $sale->outlet->id }}">--}}
            <div class="card-body" id="collapse_">
                @if (session()->has('message_'.$sale->outlet->id))
                <div class="alert alert-success">
                    {{ session('message_'.$sale->outlet->id) }}
                </div>
				@endif
{{--                @foreach ($sale->outlet->sales as $sales)--}}
{{--                    <div class="row {{ $sales->item->status?'':'text-secondary' }}">--}}
{{--                        <p class="col-auto me-auto"><strong>{{ $sales->item->name }}</strong></p>--}}
{{--                        <span class="col-auto {{ $sales->item->status?'':'text-secondary' }}">{{ number_format($sales->quantity, 0,",",".") }}</span>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
                
                    <div class="row {{ $sale->item->status?'':'text-secondary' }}">
                        <p class="col-auto me-auto"><strong>{{ $sale->item->name }}</strong></p>
                        <span class="col-auto {{ $sale->item->status?'':'text-secondary' }}">{{ number_format($sale->quantity, 0,",",".") }}</span>
                    </div>
            </div>
            
            <div class="card-footer text-center">
				<div class="row justify-content-between">
					<div class="col">
{{--						<button class="btn btn-{{!$outlet->status?'hide':'update'}}" wire:click="update({{ $outlet->id }})"><i class="bi bi-pencil"></i> Edit</button>--}}
					</div>
				</div>
            </div>
        </div>
    @endforeach
</div>

