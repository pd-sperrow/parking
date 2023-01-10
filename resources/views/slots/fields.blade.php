<form action="{{ route('slots.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="text" name="name" value="{{ isset($slot) ? $slot->name : '' }}" class="form-control" id="exampleInputName1" placeholder="Name">
        @if (isset($slot))
        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Capacity</label>
        <input type="number" step="1" name="capacity" value="{{ isset($slot) ? $slot->capacity : '' }}" class="form-control" id="exampleInputprice1" placeholder="capacity">
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>
