<div class="btn-group">
    <a href="{{ route('customers.edit', $id) }}" class="btn btn-success btn-sm">
        <i class="fa fa-edit no-margin"></i>
    </a>
    <a href="{{ route('customers.destroy', $id) }}"
       class="btn btn-danger btn-sm"
       data-method="delete" rel="nofollow"
       data-confirm="Are you sure you want to delete this record?"
       data-disable-with="<i class='fa fa-refresh fa-spin no-margin'></i>">
        <i class="fa fa-trash no-margin"></i>
    </a>
</div>