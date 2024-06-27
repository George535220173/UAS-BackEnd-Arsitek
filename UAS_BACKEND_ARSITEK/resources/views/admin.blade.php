@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <!-- Navigasi Tabs -->
        <ul class="nav nav-tabs" id="adminTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="projects-tab" data-toggle="tab" href="#projects" role="tab"
                    aria-controls="projects" aria-selected="true">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="articles-tab" data-toggle="tab" href="#articles" role="tab"
                    aria-controls="articles" aria-selected="false">Articles</a>
            </li>
        </ul>

        <!-- Konten Tabs -->
        <div class="tab-content" id="adminTabsContent">
            <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                <div class="admin-category-content">
                    <h1 class="admin-h1">Tambah Kategori Proyek</h1>
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="admin-form-group">
                                <label for="add_main_category">Kategori Utama</label>
                                <select id="add_main_category" name="main_category" required>
                                    <option value="">Pilih Kategori Utama</option>
                                    @foreach($mainCategories as $mainCategory)
                                        <option value="{{ $mainCategory }}">{{ $mainCategory }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="admin-form-group">
                                <label for="category_name">Nama Kategori</label>
                                <input type="text" id="category_name" name="name" required>
                            </div>
                            <button type="submit" class="admin-button">Tambah Kategori</button>
                        </form>
                </div>

                <div class="admin-content">
                    <h1 class="admin-h1">Tambah Proyek</h1>
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
                        @csrf
                        <div class="admin-form-group">
                            <label for="project_name">Nama Proyek</label>
                            <input type="text" id="project_name" name="project_name" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="client">Klien</label>
                            <input type="text" id="client" name="client" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="time_taken">Durasi Proyek</label>
                            <input type="text" id="time_taken" name="time_taken" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="location">Lokasi</label>
                            <input type="text" id="location" name="location" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="admin-form-group">
                            <label for="main_category_select">Kategori Utama</label>
                            <select id="main_category_select" name="main_category" required>
                                <option value="">Pilih Kategori Utama</option>
                                @foreach($mainCategories as $mainCategory)
                                    <option value="{{ $mainCategory }}">{{ $mainCategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form-group">
                            <label for="sub_category_select">Sub Kategori</label>
                            <select id="sub_category_select" name="category_id" required>
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" data-main-category="{{ $category->main_category }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form-group">
                            <label for="images">Gambar Proyek</label>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple required>
                        </div>
                        <button type="submit" class="admin-button">Tambah Proyek</button>
                    </form>
                </div>

                <h2 class="admin-h2">Daftar Proyek</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th class="admin-th">No</th>
                            <th class="admin-th">Nama Proyek</th>
                            <th class="admin-th">Klien</th>
                            <th class="admin-th">Durasi Proyek</th>
                            <th class="admin-th">Lokasi</th>
                            <th class="admin-th">Kategori</th>
                            <th class="admin-th">Gambar</th>
                            <th class="admin-th">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td class="admin-td">{{ $loop->iteration }}</td>
                                <td class="admin-td">{{ $project->project_name }}</td>
                                <td class="admin-td">{{ $project->client }}</td>
                                <td class="admin-td">{{ $project->time_taken }}</td>
                                <td class="admin-td">{{ $project->location }}</td>
                                <td class="admin-td">{{ $project->category->name }}</td>
                                <td class="admin-td">
                                    @foreach($project->images as $image)
                                        <img src="{{ asset('img/Project/' . basename($image->path)) }}" alt="Gambar Proyek" width="100">
                                    @endforeach
                                </td>
                                <td class="admin-td">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProjectModal{{ $project->id }}">Edit</button>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit Proyek -->
                            <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel{{ $project->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProjectModalLabel{{ $project->id }}">Edit Proyek</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="admin-form-group">
                                                    <label for="project_name{{ $project->id }}">Nama Proyek</label>
                                                    <input type="text" id="project_name{{ $project->id }}" name="project_name" value="{{ $project->project_name }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="client{{ $project->id }}">Klien</label>
                                                    <input type="text" id="client{{ $project->id }}" name="client" value="{{ $project->client }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="time_taken{{ $project->id }}">Durasi Proyek</label>
                                                    <input type="text" id="time_taken{{ $project->id }}" name="time_taken" value="{{ $project->time_taken }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="location{{ $project->id }}">Lokasi</label>
                                                    <input type="text" id="location{{ $project->id }}" name="location" value="{{ $project->location }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="description{{ $project->id }}">Deskripsi</label>
                                                    <textarea id="description{{ $project->id }}" name="description" required>{{ $project->description }}</textarea>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="main_category_edit{{ $project->id }}">Kategori Utama</label>
                                                    <select id="main_category_edit{{ $project->id }}" name="main_category" required>
                                                        @foreach($mainCategories as $mainCategory)
                                                            <option value="{{ $mainCategory }}" @if($project->category->main_category == $mainCategory) selected @endif>{{ $mainCategory }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="sub_category_select{{ $project->id }}">Kategori</label>
                                                    <select id="sub_category_select{{ $project->id }}" name="category_id" required>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" data-main-category="{{ $category->main_category }}" @if($project->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="images{{ $project->id }}">Gambar Proyek</label>
                                                    <input type="file" id="images{{ $project->id }}" name="images[]" accept="image/*" multiple>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Proyek</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="articles" role="tabpanel" aria-labelledby="articles-tab">
                <div class="admin-content">
                    <h1 class="admin-h1">Tambah Artikel</h1>
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" id="articleForm">
                        @csrf
                        <div class="admin-form-group">
                            <label for="article_title">Judul</label>
                            <input type="text" id="article_title" name="article_title" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="article_author">Penulis</label>
                            <input type="text" id="article_author" name="article_author" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="thumbnail">Gambar Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="article_link">Link Artikel</label>
                            <input type="text" id="article_link" name="article_link" required>
                        </div>
                        <button type="submit" class="admin-button">Tambah Artikel</button>
                    </form>
                </div>

                <h2 class="admin-h2">Daftar Artikel</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th class="admin-th">No</th>
                            <th class="admin-th">Thumbnail</th>
                            <th class="admin-th">Judul</th>
                            <th class="admin-th">Penulis</th>
                            <th class="admin-th">Link</th>
                            <th class="admin-th">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="admin-td">{{ $loop->iteration }}</td>
                                <td class="admin-td"><img src="{{ asset('img/Article/' . basename($article->thumbnail)) }}" alt="Gambar Thumbnail" width="100"></td>
                                <td class="admin-td"><a href="{{ $article->article_link }}" target="_blank">{{ $article->article_title }}</a></td>
                                <td class="admin-td">{{ $article->article_author }}</td>
                                <td class="admin-td"><a href="{{ $article->article_link }}" target="_blank">{{ $article->article_link }}</a></td>
                                <td class="admin-td">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editArticleModal{{ $article->id }}">Edit</button>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit Artikel -->
                            <div class="modal fade" id="editArticleModal{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="editArticleModalLabel{{ $article->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editArticleModalLabel{{ $article->id }}">Edit Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="admin-form-group">
                                                    <label for="article_title{{ $article->id }}">Judul</label>
                                                    <input type="text" id="article_title{{ $article->id }}" name="article_title" value="{{ $article->article_title }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="article_author{{ $article->id }}">Penulis</label>
                                                    <input type="text" id="article_author{{ $article->id }}" name="article_author" value="{{ $article->article_author }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="thumbnail{{ $article->id }}">Gambar Thumbnail</label>
                                                    <input type="file" id="thumbnail{{ $article->id }}" name="thumbnail" accept="image/*">
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="article_link{{ $article->id }}">Link Artikel</label>
                                                    <input type="text" id="article_link{{ $article->id }}" name="article_link" value="{{ $article->article_link }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Artikel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var projectDates = @json($projects->mapWithKeys(function ($project) {
        return [$project->id => $project->time_taken];
    }));

    // Subkategori dinamis berdasarkan kategori utama
    document.addEventListener('DOMContentLoaded', function () {
        const mainCategorySelect = document.querySelectorAll('[id^="main_category_"]');
        const subCategorySelect = document.querySelectorAll('[id^="sub_category_select"]');

        mainCategorySelect.forEach(mainCategory => {
            mainCategory.addEventListener('change', function () {
                const selectedMainCategory = this.value;
                subCategorySelect.forEach(subCategory => {
                    const options = subCategory.querySelectorAll('option');
                    options.forEach(option => {
                        if (option.getAttribute('data-main-category') === selectedMainCategory || option.value === '') {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                        }
                    });
                    subCategory.value = ''; // Reset pilihan subkategori
                });
            });

            // Memicu event change untuk memfilter subkategori saat halaman dimuat
            mainCategory.dispatchEvent(new Event('change'));
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Ambil tab aktif dari localStorage
        let activeTab = localStorage.getItem('activeTab');

        // Kalau ada tab yang tersimpan, aktifkan
        if (activeTab) {
            const tab = document.querySelector(`[href="#${activeTab}"]`);
            if (tab) {
                tab.click();
            }
        }

        // Simpan tab aktif ke localStorage saat diklik
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function () {
                localStorage.setItem('activeTab', this.getAttribute('href').substring(1));
            });
        });
    });
</script>
@endsection
