@extends('layouts.app')

@section('content')
<div class="admin-main">
    <div class="admin-container">
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
                <label for="time_taken">Time Taken</label>
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
                <label for="image">Project Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="admin-button">Add Project</button>
        </form>

        <h2 class="admin-h2">Projects List</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th class="admin-th">No</th>
                    <th class="admin-th">Project Name</th>
                    <th class="admin-th">Client</th>
                    <th class="admin-th">Project Duration</th>
                    <th class="admin-th">Location</th>
                    <th class="admin-th">Image</th>
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
                        <td class="admin-td"><img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" width="100"></td>
                        <td class="admin-td">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProjectModal{{ $project->id }}">Edit</button>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Project Modal -->
                    <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="admin-form-group">
                                            <label for="project_name">Project Name</label>
                                            <input type="text" id="project_name" name="project_name" value="{{ $project->project_name }}" required>
                                        </div>
                                        <div class="admin-form-group">
                                            <label for="client">Client</label>
                                            <input type="text" id="client" name="client" value="{{ $project->client }}" required>
                                        </div>
                                        <div class="admin-form-group">
                                            <label for="time_taken">Time Taken</label>
                                            <input type="text" id="time_taken" name="time_taken" value="{{ $project->time_taken }}" required>
                                        </div>
                                        <div class="admin-form-group">
                                            <label for="location">Location</label>
                                            <input type="text" id="location" name="location" value="{{ $project->location }}" required>
                                        </div>
                                        <div class="admin-form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" required>{{ $project->description }}</textarea>
                                        </div>
                                        <div class="admin-form-group">
                                            <label for="image">Project Image</label>
                                            <input type="file" id="image" name="image" accept="image/*">
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

    <div class="articles-container">
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
                    <label for="article_content">Content</label>
                    <textarea id="article_content" name="article_content" required></textarea>
                </div>
                <button type="submit" class="admin-button">Add Article</button>
            </form>

            <h2 class="admin-h2">Articles List</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th class="admin-th">No</th>
                        <th class="admin-th">Title</th>
                        <th class="admin-th">Author</th>
                        <th class="admin-th">Content</th>
                        <th class="admin-th">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td class="admin-td">{{ $loop->iteration }}</td>
                            <td class="admin-td">{{ $article->article_title }}</td>
                            <td class="admin-td">{{ $article->article_author }}</td>
                            <td class="admin-td">{{ $article->article_content }}</td>
                            <td class="admin-td">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editArticleModal{{ $article->id }}">Edit</button>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Article Modal -->
                        <div class="modal fade" id="editArticleModal{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="editArticleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editArticleModalLabel">Edit Article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="admin-form-group">
                                                <label for="article_title">Title</label>
                                                <input type="text" id="article_title" name="article_title" value="{{ $article->article_title }}" required>
                                            </div>
                                            <div class="admin-form-group">
                                                <label for="article_author">Author</label>
                                                <input type="text" id="article_author" name="article_author" value="{{ $article->article_author }}" required>
                                            </div>
                                            <div class="admin-form-group">
                                                <label for="article_content">Content</label>
                                                <textarea id="article_content" name="article_content" required>{{ $article->article_content }}</textarea>
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
@endsection
