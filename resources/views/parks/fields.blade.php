<form action="{{ route('parks.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($park))
                            {{ $park->vehicle->category_id == $category->id ? 'selected' : '' }}
                    @endif>
                    {{ $category->name }}</option>
                    @endforeach
                </select>
                @if (isset($park))
                    <input type="hidden" name="park_id" value="{{ $park->id }}">
                    <input type="hidden" name="vehicle_id" value="{{ $park->vehicle->id }}">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <label>Select Parking Area</label>
            <select name="slot_id" class="form-control">
                <option value="">Select</option>
                @foreach ($slots as $slot)
                    @php
                        $capacity = $slot->capacity - $slot->parks->count();
                        if ($capacity > 0) {
                            $text = ', Available slots - ' . $capacity;
                        } else {
                            $text = ', No available slots';
                        }
                    @endphp
                    <option value="{{ $slot->id }}" @if (isset($park))
                        {{ $park->slot_id == $slot->id ? 'selected' : '' }}
                @endif @if(!isset($park) && $capacity <= 0) disabled @endif>
                {{ $slot->name . $text }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Vehicle Name</label>
                <input type="text" name="name" value="{{ isset($park) ? $park->vehicle->name : '' }}"
                    class="form-control" id="" placeholder="Vehicle Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Vehicle Reg. No:</label>
                <input type="text" name="reg_no" value="{{ isset($park) ? $park->vehicle->reg_no : '' }}"
                    class="form-control" id="" placeholder="Registration Number">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Customer Name:</label>
                <input type="text" name="customer_name" value="{{ isset($park) ? $park->customer_name : '' }}"
                    class="form-control" id="" placeholder="Customer Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Customer Phone:</label>
                <input type="text" name="customer_phone" value="{{ isset($park) ? $park->customer_phone : '' }}"
                    class="form-control" id="" placeholder="Customer Phone">
            </div>
        </div>
        @if(isset($park) && $park->status == 'in_parking')
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mark as leave</label>
                    <select name="leaved" class="form-control">
                        <option value="">Select</option>
                        <option value="leaved" @if (isset($park))
                            {{ $park->status == 'leaved' ? 'selected' : '' }} @endif>
                            Leave</option>
                    </select>
                </div>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>
