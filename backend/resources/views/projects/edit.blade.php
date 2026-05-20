@extends('layouts.app')

@section('content')
    <!-- READ TABLE -->
        <h1 class="text-2xl font-bold mb-4">Projects List</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Title</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Due Date</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($projects as $project)

                        <tr class="border-b" data-id="{{ $project->id }}">

                            <td class="p-3">
                                {{ $project->id }}
                            </td>

                            <td class="p-3">
                                {{ $project->title }}
                            </td>

                            <td class="p-3">
                                {{ $project->description }}
                            </td>

                            <td class="p-3">
                                {{ $project->status }}
                            </td>

                            <td class="p-3">
                                {{ $project->due_date ?? 'N/A' }}
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-3 flex gap-2">

                                <!-- EDIT -->
                                <a
                                    class="edit-btn px-3 py-1 bg-blue-500 text-white rounded cursor-pointer"
                                    data-id="{{ $project->id }}"
                                >
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <button class="delete-btn px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">
                                No projects found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- EDIT MODAL -->
        <div
            id="editModal"
            class="hidden fixed inset-0 bg-black/50 flex items-center justify-center"
        >

            <div class="bg-white p-6 rounded w-[600px]">

                <h2 class="text-xl font-bold mb-4">Edit Project</h2>

                <form id="editForm" class="space-y-2">

                    <input type="hidden" name="id" id="edit_id">

                    <input
                        name="title"
                        id="edit_title"
                        class="border p-2 w-full"
                        placeholder="Project Title"
                    >

                    <textarea
                        name="description"
                        id="edit_description"
                        class="border p-2 w-full"
                        placeholder="Project Description"
                    ></textarea>

                    <select
                        name="status"
                        id="edit_status"
                        class="border p-2 w-full"
                    >
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>

                    <input
                        type="date"
                        name="due_date"
                        id="edit_due_date"
                        class="border p-2 w-full"
                    >

                    <div class="flex justify-end gap-2 mt-4">

                        <button
                            type="button"
                            id="closeModal"
                            class="px-3 py-1 bg-gray-400 text-white rounded"
                        >
                            Cancel
                        </button>

                        <button
                            class="px-3 py-1 bg-green-600 text-white rounded"
                        >
                            Save
                        </button>

                    </div>

                </form>

            </div>

        </div>
@endsection