@canany([$resourceRouteName . '.show', $resourceRouteName . '.edit',
        $resourceRouteName . '.destroy', $resourceRouteName . '.restore'])
    <div class="d-flex justify-content-center">
        <a id="actions1Invoker"
           class="link-muted {{ $bgClass ?? '' }}" href="#!"
           aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
            <i class="fa fa-sliders-h"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown"
             style="width: 150px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(898px, 169px, 0px);"
             aria-labelledby="actions1Invoker" x-placement="bottom-end">
            <ul class="list-unstyled mb-0">
                @if(in_array('show', $options) && Route::has($resourceRouteName . '.show'))
                    @can($resourceRouteName . '.show')
                        <li>
                            <a href="{{ route($resourceRouteName . '.show', $id) }}" title="Show"
                               class="d-flex align-items-center link-muted py-2 px-3">
                                <i class="fas fa-eye  mr-2"></i> Details
                            </a>
                        </li>
                    @endcan
                @endif

                @if(in_array('edit', $options) && Route::has($resourceRouteName . '.edit'))
                    @can($resourceRouteName . '.edit')
                        <li>
                            <a href="{{ route($resourceRouteName . '.edit', $id) }}" title="Edit"
                               class="d-flex align-items-center link-muted py-2 px-3">
                                <i class="fas fa-edit  mr-2"></i> Edit
                            </a>
                        </li>
                    @endcan
                @endif

                @if(in_array('delete', $options) && Route::has($resourceRouteName . '.destroy'))
                    @can($resourceRouteName . '.destroy')
                        <li>
                            <a href="{{ route('admin.common.delete', [$resourceRouteName, $id]) }}" title="Delete"
                               class="d-flex align-items-center link-muted py-2 px-3 delete-btn">
                                <i class="fas fa-trash  mr-2"></i> Delete
                            </a>
                        </li>
                    @endcan
                @endif

                @if(in_array('delete', $options) && Route::has($resourceRouteName . '.restore'))
                    @can($resourceRouteName . '.restore')
                        <li>
                            <a href="{{ route($resourceRouteName . '.restore', $id) }}" title="Restore"
                               class="d-flex align-items-center link-muted py-2 px-3">
                                <i class="fas fa-trash-restore  mr-2"></i> Restore
                            </a>
                        </li>
                    @endcan
                @endif
            </ul>
        </div>
    </div>
@endcanany
