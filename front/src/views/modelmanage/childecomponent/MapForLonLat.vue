<template>
    <span>
        <el-button type="primary" size="mini" @click="showMap">当前定位</el-button>

        <el-dialog title="拾取坐标" :visible.sync="mapVisible" width="80%">
            <div style="margin-bottom:20px">
                当前坐标点：
                <span style="font-weight: bold;">{{ currentloglat }}</span>
            </div>
            <div id="container" style="width: 100%;height:55vh"></div>
            <!-- <baidu-map id="allmap" @ready="mapReady"></baidu-map> -->
            <span slot="footer" class="dialog-footer">
                <el-button size="mini" @click="cancel">取 消</el-button>
                <el-button size="mini" type="primary" @click="mapVisible = false">确 定</el-button>
            </span>
        </el-dialog>
    </span>
</template>

<script>

import BMap from "BMap"
export default {
    data() {
        return {
            mapVisible: false,
            mapInited: false,
            currentloglat: '',
            ruleForm: {},
            map: null
        }
    },
    created() {
        this.ruleForm = { ...this.form }
    },
    props: ['form'],
    methods: {
        showMap() {
            this.mapVisible = true;

            setTimeout(() => {
                if (!this.mapInited) {
                    this.initMap()
                } else {
                    let point = null
                    let marker = null; //存放标注点对象的数组
                    this.map.clearOverlays();
                    if (this.form.longitude &&
                        this.form.latitude) {
                        point = new BMap.Point(this.form.longitude, this.form.latitude);
                        this.currentloglat = `${this.form.longitude}, ${this.form.latitude}`
                        marker = new BMap.Marker(point); // 创建标注
                        this.map.addOverlay(marker); // 将标注添加到地图中
                    } else {
                        point = new BMap.Point(112.49226, 37.733458);
                    }
                }
            }, 300);
        },
        cancel() {
            this.mapVisible = false;
            this.$emit('chageLatitudeNndLongitude', this.ruleForm.longitude, this.ruleForm.latitude)
            this.currentloglat = `${this.ruleForm.longitude}${this.ruleForm.longitude ? "," : ""} ${this.ruleForm.latitude}`
        },
        //初始化地图
        initMap() {
            this.mapInited = true
            this.map = new BMap.Map("container");
            const that = this
            let point = null
            let marker = null; //存放标注点对象的数组
            let infoWindow = new Array(); //存放提示信息窗口对象的数组
            this.map.enableScrollWheelZoom(true);
            let zoomCtrl = new BMap.NavigationControl(); // 添加比例尺控件
            this.map.addControl(zoomCtrl);
            if (that.form.longitude &&
                that.form.latitude) {
                point = new BMap.Point(that.form.longitude, that.form.latitude);
                that.currentloglat = `${that.form.longitude}, ${that.form.latitude}`
                marker = new BMap.Marker(point); // 创建标注
                this.map.addOverlay(marker); // 将标注添加到地图中
            } else {
                point = new BMap.Point(112.49226, 37.733458);
            }
            // 创建点坐标 
            that.map.centerAndZoom(point, 17);
            that.map.addEventListener("click", function (e) {
                that.map.clearOverlays();
                let lng = e.point.lng;
                let lat = e.point.lat
                //var b = new BMap.MercatorProjection().pointToLngLat(new BMap.Pixel(lng, lat));
                // that.ruleForm.longitude = lng
                // that.ruleForm.latitude = lat
                that.currentloglat = `${lng}, ${lat}`
                //prompt("鼠标单击地方的经纬度为：",e.point.lng + "," + e.point.lat);
                let point1 = new BMap.Point(lng, lat);
                marker = new BMap.Marker(point1); // 创建标注
                that.map.addOverlay(marker); // 将标注添加到地图中
                that.$emit('chageLatitudeNndLongitude', lng, lat)
            });


        },
        // mapReady({ BMap, map }) {
        //     // 选择一个经纬度作为中心点
        //     this.point = new BMap.Point(113.27, 23.13);
        //     map.centerAndZoom(this.point, 12);
        // },
    }
}
</script>

<style>
</style>