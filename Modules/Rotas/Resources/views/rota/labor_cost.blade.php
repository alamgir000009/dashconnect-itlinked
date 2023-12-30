<td>
    <div class="d-flex">
        <div class="col-md-6">
            LABOR COST
        </div>
        <div class="col-md-6">
            <div class="d-flex">
                <div class="{{ $perClass }}" id="increase-decrease-cost">
                    ({{ $increaseOrDecrease }}%) &nbsp;
                </div>
                <span id="total_labor_cost">
                    {{ currency_format_with_sym($totalLaborCostSum) }}
                </span>
            </div>
        </div>
    </div>
</td>
@foreach ($totalLaborCosts as $day)
    <td>
        <span>{{ $day['cost'] }}</span>
    </td>
@endforeach
