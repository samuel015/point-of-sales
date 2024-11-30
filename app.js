new Vue({
    el: '#app',
    data: {
        productName: '',
        productPrice: '',
        productStock: '',
        productSupplier: '',
        productId: null,
        customerName: '',
        customerEmail: '',
        customerId: null,
        salesReport: []
    },
    methods: {
        addProduct() {
            fetch('backend/routes/api.php?action=addProduct', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: this.productName,
                    price: this.productPrice,
                    stock: this.productStock,
                    supplier: this.productSupplier
                })
            })
            .then(response => response.json())
 .then(data => {
                this.productId = data.product_id;
                this.productName = '';
                this.productPrice = '';
                this.productStock = '';
                this.productSupplier = '';
            })
            .catch(error => console.error('Error:', error));
        },
        addCustomer() {
            fetch('backend/routes/api.php?action=addCustomer', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: this.customerName,
                    email: this.customerEmail
                })
            })
            .then(response => response.json())
            .then(data => {
                this.customerId = data.customer_id;
                this.customerName = '';
                this.customerEmail = '';
            })
            .catch(error => console.error('Error:', error));
        },
        fetchSalesReport() {
            fetch('backend/routes/api.php?action=getSalesReport')
                .then(response => response.json())
                .then(data => {
                    this.salesReport = data;
                })
                .catch(error => console.error('Error:', error));
        }
    }
});
