@forelse($data as $datum)
    <tr class="align-middle">
        <td>{{$loop->iteration}}.</td>
        <td>{{$datum->client->name}}</td>
        <td>{{$datum->client->email}}</td>
        <td>{{$datum->client->phone}}</td>
        <td>{{$datum->message_title}}</td>
        <td>{{$datum->message_content}}</td>
        <td colspan="3">
            <a class="btn btn-danger"
               href="{{ route("admin.contact-us.destroy", $datum->id) }}"
               onclick="event.preventDefault(); document.getElementById('delete-form-{{$datum->id}}').submit()">
                Delete
            </a>
            <form id="delete-form-{{$datum->id}}"
                  action="{{ route("admin.contact-us.destroy", $datum->id) }}"
                  method="post" style="display: none;">
                @csrf
                @method("DELETE")
            </form>
        </td>
    </tr>
@empty
    <tr class="align-middle">
        <td colspan="7">No Data Found</td>
    </tr>
@endforelse
