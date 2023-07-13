
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
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

        <input type="checkbox"
        class="btn-check"
        id="btncheck1"
        name="category[]"
        value="aplikasi"
        @if (isset($category))
        {{ in_array('aplikasi', $category) ? 'checked' : NULL }}
        @endif
        autocomplete="off">

        <label class="btn btn-outline-primary" for="btncheck1">Aplikasi</label>

        <input
        type="checkbox"
        class="btn-check"
        id="btncheck2"
        name="category[]"
        value="operasi"
        @if (isset($category))
        {{ in_array('operasi', $category) ? 'checked' : NULL }}
        @endif
        autocomplete="off">

        <label class="btn btn-outline-primary" for="btncheck2">Operasi</label>

        <input type="checkbox" class="btn-check" id="btncheck3" name="category[]" value="keselamatan" @if (isset($category)){{ in_array('keselamatan', $category) ? 'checked' : NULL }}@endif autocomplete="off">
        <label class="btn btn-outline-primary" for="btncheck3">Keselamatan</label>
    </div>
</div>

<div class="mb-3">
    <label for="lampiran" class="form-label">Lampiran</label>
    <input type="file" name="lampiran">
</div>

