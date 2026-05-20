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
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">
                                No projects found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
@endsection