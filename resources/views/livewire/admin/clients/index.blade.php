<div>
    <x-slot:header>Clients</x-slot:header>

    <div class="card">
        <div class="card-header bg-inv-secondary text-inv-primary border-0">
            <h5>Clients' list</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover  ">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Basic Details</th>
                        <th>Address</th>
                        <th>Business Details</th>
                        <th>Account Details</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td scope="row">{{ $client->id }}</td>
                            <td>
                                <h6>{{ $client->name }}</h6>
                                <small>{{ $client->email }}</small><br>
                                <small>{{ $client->phone_number }}</small>
                            </td>
                            <td>{{ $client->address }}</td>
                            <td>
                                <small><strong>Tax ID:</strong> {{ $client->tax_id }}</small><br>
                                <small><strong>Reg No:</strong> {{ $client->registration_number ?? 'N/A' }}</small>
                            </td>
                            <td>
                                <small><strong>Bank:</strong> {{ $client->bank->name }}</small><br>
                                <small><strong>A/c No:</strong> {{ $client->account_number }}</small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.clients.edit', $client->id) }}"
                                    class="btn btn-secondary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
