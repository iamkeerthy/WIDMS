document.addEventListener('DOMContentLoaded', () => {
    const quantity = document.getElementById('quantity');
    const unitCost = document.getElementById('unit_cost');
    const totalCost = document.getElementById('total_cost');
    const paymentStatus = document.getElementById('payment_status');
    const paidAmountField = document.getElementById('paid-amount-field');
    const paidAmount = document.getElementById('paid_amount');
    const balanceAmount = document.getElementById('balance_amount');

    function calculate() {
        const total = Math.max(0, Number(quantity.value) || 0) * Math.max(0, Number(unitCost.value) || 0);
        let paid = 0;
        if (paymentStatus.value === 'fully-paid') paid = total;
        if (paymentStatus.value === 'partially-paid') paid = Math.max(0, Number(paidAmount.value) || 0);
        totalCost.value = total.toFixed(2);
        balanceAmount.value = Math.max(0, total - paid).toFixed(2);
        paidAmountField.hidden = paymentStatus.value !== 'partially-paid';
        paidAmount.required = paymentStatus.value === 'partially-paid';
    }

    [quantity, unitCost, paymentStatus, paidAmount].forEach((field) => field.addEventListener('input', calculate));
    paymentStatus.addEventListener('change', calculate);
    calculate();
});
