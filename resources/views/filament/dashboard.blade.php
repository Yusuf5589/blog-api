<div>
    <h1>Dashboard</h1>
    <div>
        <img src="{{ $this->getProfilePhotoUrl() }}" alt="Profil Fotoğrafı" class="rounded-full" width="50" />
        <span>{{ auth()->user()->name }}</span>
    </div>
</div>
