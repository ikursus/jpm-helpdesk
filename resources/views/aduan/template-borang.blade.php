
<div class="mb-3">
    <label for="nama_pengadu" class="form-label">Nama Pengadu</label>

    <input
    type="text"
    class="form-control @error('nama_pengadu') is-invalid @enderror"
    name="nama_pengadu"
    placeholder="E.g: Ahmad"
    value="{{ auth()->user()->name }}">


    @error('nama_pengadu')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Email Pengadu</label>
    <input type="text" class="form-control" name="email_pengadu" placeholder="E.g: ahmad@gmail.com" value="{{ auth()->user()->email }}">
</div>

<div class="mb-3">
    <label for="title" class="form-label">Tajuk Aduan</label>
    <input
    type="text"
    class="form-control"
    name="title"
    placeholder="E.g: Tidak dapat hantar email"
    value="{{ isset($aduan) ? $aduan->title : old('title') }}">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Maklumat Aduan</label>
    <textarea class="form-control" name="description" rows="3">{{ isset($aduan) ? $aduan->description : old('description') }}</textarea>
</div>

<div class="mb-3">
    <label for="lampiran" class="form-label">Lampiran</label>
    <input type="file" name="lampiran">
</div>

