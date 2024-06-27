@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
        <!-- Tabs navigation -->
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

        <!-- Tabs content -->
        <div class="tab-content" id="adminTabsContent">
            <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                <h1 class="admin-h1">Add Project Category</h1>
                <div class="admin-smaller-content">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="admin-form-group">
                            <label for="add_main_category">Main Category</label>
                            <select id="add_main_category" name="main_category" required>
                                <option value="">Select Main Category</option>
                                @foreach($mainCategories as $mainCategory)
                                    <option value="{{ $mainCategory }}">{{ $mainCategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" id="category_name" name="name" required>
                        </div>
                        <button type="submit" class="admin-button">Add Category</button>
                    </form>

                    <h1 class="admin-h1">Projects Addins</h1>
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="admin-form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" id="project_name" name="project_name" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="client">Client</label>
                            <input type="text" id="client" name="client" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="time_taken">Project Duration</label>
                            <input type="text" id="time_taken" name="time_taken" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="admin-form-group">
                            <label for="main_category_select">Main Category</label>
                            <select id="main_category_select" name="main_category" required>
                                <option value="">Select Main Category</option>
                                @foreach($mainCategories as $mainCategory)
                                    <option value="{{ $mainCategory }}">{{ $mainCategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form-group">
                            <label for="sub_category_select">Sub Category</label>
                            <select id="sub_category_select" name="category_id" required>
                                <option value="">Select Sub Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" data-main-category="{{ $category->main_category }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form-group">
                            <label for="images">Project Images</label>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple required>
                        </div>
                        <button type="submit" class="admin-button">Add Project</button>
                    </form>
                </div>
                <h2 class="admin-h2">Projects List</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th class="admin-th">No</th>
                            <th class="admin-th">Project Name</th>
                            <th class="admin-th">Client</th>
                            <th class="admin-th">Project Duration</th>
                            <th class="admin-th">Location</th>
                            <th class="admin-th">Category</th>
                            <th class="admin-th">Images</th>
                            <th class="admin-th">Actions</th>
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
                                        <img src="{{ asset('img/Project/' . basename($image->path)) }}" alt="Project Image"
                                            width="100">
                                    @endforeach
                                </td>
                                <td class="admin-td">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editProjectModal{{ $project->id }}">Edit</button>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Project Modal -->
                            <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editProjectModalLabel{{ $project->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProjectModalLabel{{ $project->id }}">Edit
                                                Project</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="admin-form-group">
                                                    <label for="project_name{{ $project->id }}">Project Name</label>
                                                    <input type="text" id="project_name{{ $project->id }}"
                                                        name="project_name" value="{{ $project->project_name }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="client{{ $project->id }}">Client</label>
                                                    <input type="text" id="client{{ $project->id }}" name="client"
                                                        value="{{ $project->client }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="time_taken{{ $project->id }}">Time Taken</label>
                                                    <input type="text" id="time_taken{{ $project->id }}" name="time_taken"
                                                        value="{{ $project->time_taken }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="location{{ $project->id }}">Location</label>
                                                    <input type="text" id="location{{ $project->id }}" name="location"
                                                        value="{{ $project->location }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="description{{ $project->id }}">Description</label>
                                                    <textarea id="description{{ $project->id }}" name="description"
                                                        required>{{ $project->description }}</textarea>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="category_id{{ $project->id }}">Category</label>
                                                    <select id="category_id{{ $project->id }}" name="category_id" required>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                @if($project->category_id == $category->id) selected @endif>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="images{{ $project->id }}">Project Images</label>
                                                    <input type="file" id="images{{ $project->id }}" name="images[]"
                                                        accept="image/*" multiple>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Project</button>
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
                <div class="admin-article-smaller">
                    <h1 class="admin-h1">Articles Addins</h1>
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="admin-form-group">
                            <label for="article_title">Title</label>
                            <input type="text" id="article_title" name="article_title" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="article_author">Author</label>
                            <input type="text" id="article_author" name="article_author" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="thumbnail">Thumbnail Image</label>
                            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
                        </div>
                        <div class="admin-form-group">
                            <label for="article_link">Article Link</label>
                            <input type="text" id="article_link" name="article_link" required>
                        </div>
                        <button type="submit" class="admin-button">Add Article</button>
                    </form>
                </div>
                <h2 class="admin-h2">Articles List</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th class="admin-th">No</th>
                            <th class="admin-th">Thumbnail</th>
                            <th class="admin-th">Title</th>
                            <th class="admin-th">Author</th>
                            <th class="admin-th">Link</th>
                            <th class="admin-th">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="admin-td">{{ $loop->iteration }}</td>
                                <td class="admin-td"><img src="{{ asset('storage/' . $article->thumbnail) }}"
                                        alt="Thumbnail Image" width="100"></td>
                                <td class="admin-td"><a href="{{ $article->article_link }}"
                                        target="_blank">{{ $article->article_title }}</a></td>
                                <td class="admin-td">{{ $article->article_author }}</td>
                                <td class="admin-td"><a href="{{ $article->article_link }}"
                                        target="_blank">{{ $article->article_link }}</a></td>
                                <td class="admin-td">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editArticleModal{{ $article->id }}">Edit</button>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Article Modal -->
                            <div class="modal fade" id="editArticleModal{{ $article->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editArticleModalLabel{{ $article->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editArticleModalLabel{{ $article->id }}">Edit
                                                Article</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="admin-form-group">
                                                    <label for="article_title{{ $article->id }}">Title</label>
                                                    <input type="text" id="article_title{{ $article->id }}"
                                                        name="article_title" value="{{ $article->article_title }}" required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="article_author{{ $article->id }}">Author</label>
                                                    <input type="text" id="article_author{{ $article->id }}"
                                                        name="article_author" value="{{ $article->article_author }}"
                                                        required>
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="thumbnail{{ $article->id }}">Thumbnail Image</label>
                                                    <input type="file" id="thumbnail{{ $article->id }}" name="thumbnail"
                                                        accept="image/*">
                                                </div>
                                                <div class="admin-form-group">
                                                    <label for="article_link{{ $article->id }}">Article Link</label>
                                                    <input type="text" id="article_link{{ $article->id }}"
                                                        name="article_link" value="{{ $article->article_link }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Article</button>
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

    // Dynamic Subcategories based on Main Category
    document.addEventListener('DOMContentLoaded', function () {
        const mainCategorySelect = document.querySelector('#main_category_select');
        const subCategorySelect = document.querySelector('#sub_category_select');

        mainCategorySelect.addEventListener('change', function () {
            const selectedMainCategory = this.value;
            const options = subCategorySelect.querySelectorAll('option');

            options.forEach(option => {
                if (option.getAttribute('data-main-category') === selectedMainCategory || option.value === '') {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });

            subCategorySelect.value = ''; // Reset subcategory selection
        });

        // Trigger change event to filter subcategories on page load
        mainCategorySelect.dispatchEvent(new Event('change'));
    });
</script>

@endsection