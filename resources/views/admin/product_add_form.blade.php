@extends('layouts.admin')

@section('contents')
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist">
                <caption>Add new product</caption>
                <tr>
                    <td>
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data"
                              class="adm_form">
                            @csrf
                            <div class="adm_form_row">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" tabindex="1" required
                                       autofocus/>
                            </div>
                            <div class="adm_form_row">
                                <label for="price">Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" tabindex="2" required/>
                            </div>
                            <div class="admfmctrls">
                                <button type="button" class="cancel" tabindex="3"
                                        onclick="document.location.href='{{ route('admin.products.list') }}'">Cancel</button>
                                <button type="submit" class="do" tabindex="4">Send</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
