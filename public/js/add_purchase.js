const $tableID = $('#table');
const $BTN = $('#export-btn');
const $EXPORT = $('#export');
var count2 = 0;

$('.table-add').on('click', 'i', () => {


    count2++;
    newTr = `
    <tr>
    <td class="pt-3-half">
    <input list="products" class="prod_name" id="prod_name` + count2 + `" name="prod_name[]" placeholder="Product Name" onchange="getProduct(this)">
    <datalist id="products" class="prod_name">
    </datalist>
    
    <?php csrf_field() ?>
    </td>
    <td class="pt-3-half">
        <input type="text" class="prod_code" placeholder="Product Code" readonly name="prod_code[]" id="prod_code_` + count2 + `">
    </td>
    <td class="pt-3-half">
        <input type="text" placeholder="Product Category" name="prod_category[]" readonly  id="prod_category_` + count2 + `">
    </td>
    <td class="pt-3-half">
        <input type="text" placeholder="Product Price" name="prod_price[]" readonly id="prod_price_` + count2 + `">
    </td>
    <td class="pt-3-half">
        <input type="text" placeholder="Product Quantity" onchange="getId(this,this.value)" name="prod_quantity[]" id="prod_quantity_` + count2 + `">
    </td>
    <td class="pt-3-half">
        <input type="text" placeholder="Total Price"  name="total_price[]" readonly id="total_price_` + count2 + `">
    </td>
    <td>
        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
    </td>
</tr>`;

    //  alert(newTr);
    const $clone = $tableID.find('tbody').last().clone(true).removeClass('hide table-line');

    if ($tableID.find('tbody tr').length === 0) {

        $('tbody').append(newTr);
    } else {

        $('tbody').append(newTr);
    }


});

$tableID.on('click', '.table-remove', function() {

    $(this).parents('tr').detach();
});

$tableID.on('click', '.table-up', function() {

    const $row = $(this).parents('tr');

    if ($row.index() === 1) {
        return;
    }

    $row.prev().before($row.get(0));
});

$tableID.on('click', '.table-down', function() {

    const $row = $(this).parents('tr');
    $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.on('click', () => {

    const $rows = $tableID.find('tr:not(:hidden)');
    const headers = [];
    const data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {

        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        const $td = $(this).find('td');
        const h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach((header, i) => {

            h[header] = $td.eq(i).text();
        });

        data.push(h);

        count++;
    });

    // Output the result
    $EXPORT.text(JSON.stringify(data));
});








/**************KEY EVENTS */
document.addEventListener('keypress', function(event) {
    if (event.code == 'KeyN') {
        count2++;
        newTr = `
<tr>
<td class="pt-3-half">
<input list="products" class="prod_name" id="prod_name` + count2 + `" name="prod_name[]" placeholder="Product Name" onchange="getProduct(this)">
<datalist id="products" class="prod_name">
</datalist>

<?php csrf_field() ?>
</td>
<td class="pt-3-half">
    <input type="text" class="prod_code" placeholder="Product Code" name="prod_code[]" id="prod_code_` + count2 + `">
</td>
<td class="pt-3-half">
    <input type="text" placeholder="Product Category" name="prod_category[]" id="prod_category_` + count2 + `">
</td>
<td class="pt-3-half">
    <input type="text" placeholder="Product Price" name="prod_price[]" id="prod_price_` + count2 + `">
</td>
<td class="pt-3-half">
    <input type="text" placeholder="Product Quantity" onchange="getId(this,this.value)" name="prod_quantity[]" id="prod_quantity_` + count2 + `">
</td>
<td class="pt-3-half">
    <input type="text" placeholder="Total Price"  name="total_price[]" id="total_price_` + count2 + `">
</td>
<td>
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
</td>
</tr>`;

        //  alert(newTr);
        const $clone = $tableID.find('tbody').last().clone(true).removeClass('hide table-line');

        if ($tableID.find('tbody tr').length === 0) {

            $('tbody').append(newTr);
        } else {

            $('tbody').append(newTr);
        }

    }
});