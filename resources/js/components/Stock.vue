<template>
    <div class="stock-wrapper">
        <div class="card-title">Stock Data</div>
        <table class="table table-striped table-hover">
            <tbody>
                <tr v-for="stock in stockData" v-bind:class="getRowClass(stock.change)">
                    <td>{{stock.name}}</td>
                    <td class="price">{{stock.price}}</td>
                    <td class="change">{{stock.change}}</td>
                    <td class="percentage">{{stock.percentage}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import {stockData} from './../config';
    import _ from 'lodash';
    export default {
        created () {
            this.getStockPrices();
            setInterval(() => {
                this.getStockPrices();
            }, 3000);
        },
        data () {
            return {
                stocks: ['LT', 'ONGC', 'SAIL'],
                stockData: []
            }
        },
        methods: {
            getStockPrices () {
              window.axios.post(stockData, this.stocks)
                  .then(res => {
                      let stockData = [];
                      _.forEach(res.data, (stock, name) => {
                          stockData.push(stock);
                      });
                      this.stockData = stockData;
                  })
            },
            getRowClass (value) {
                return (value > 0) ? 'green' : 'red';
            }
        }
    }
</script>
<style lang="scss">
    tr.green {
        td.price, td.change, td.percentage {
            color: green;
        }
    }
    tr.red {
        td.price, td.change, td.percentage {
            color: red;
        }
    }
</style>