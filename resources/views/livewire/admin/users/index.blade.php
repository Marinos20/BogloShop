<div class="card-body text-nowrap table-responsive">
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if ($users->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Commande totale</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at ? 'Vérifié' : 'Non vérifié' }}</td>

                        <td>
                            @if ($userIdBeingEdited === $user->id)
                                <select wire:model="role" class="form-select form-select-sm">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            @else
                                {{ $user->is_admin ? 'Admin' : 'User' }}
                            @endif
                        </td>

                        <td>{{ $user->ViewAllOrder->count() }}</td>
                        <td>{{ $user->created_at->format('d D M, Y') }}</td>

                        <td>
                            @if ($userIdBeingEdited === $user->id)
                                <button wire:click="updateUser" class="btn btn-sm btn-success">✔️ Sauvegarder</button>
                                <button wire:click="$set('userIdBeingEdited', null)" class="btn btn-sm btn-secondary">✖️ Annuler</button>
                            @else
                                <button wire:click="editUser({{ $user->id }})" class="btn btn-sm btn-dark">✏️ Éditer</button>
                            @endif

                            <button wire:click="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $users->links() }}

        {{-- Confirmation de suppression --}}
        @if ($confirmingUserDeletion)
            <div class="alert alert-warning mt-3 text-center">
                <p>⚠️ Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                <button wire:click="deleteUser" class="btn btn-danger btn-sm">Oui, Supprimer</button>
                <button wire:click="$set('confirmingUserDeletion', false)" class="btn btn-secondary btn-sm">Annuler</button>
            </div>
        @endif

    @else
        <div class="alert alert-info text-center">
            {{ $none }}
        </div>
    @endif
</div>
