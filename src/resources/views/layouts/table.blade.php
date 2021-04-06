<table class="table table-striped">
    <thead>
        <tr>
            @include("akcauser.cruder.layouts.table_header")
            <th colspan="3" style="width: 10%">Action</th>
        </tr>
    </thead>
    <tbody>
    
        <tr>
            @include("akcauser.cruder.layouts.table_cell")
            <td>
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                    <a href="#" class='btn btn-default btn-xs'><i class="fas fa-pen"></i></a>
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                </div>
                
            </td>
        </tr>
    
    </tbody>
</table>
