"use strict";

var canvas = document.querySelector("canvas");
var w = canvas.offsetWidth;
var h = canvas.offsetHeight;
canvas.width = w;
canvas.height = h;
var renderer = new THREE.WebGLRenderer({
  canvas: canvas,
  antialias: true,
  alpha:true,
  logarithmicDepthBuffer: true
});
renderer.setSize(w, h);

var scene = new THREE.Scene();

var camera = new THREE.PerspectiveCamera(75, w / h, 0.1, 100);
camera.position.set(-3, 2.5, 5);
camera.lookAt(new THREE.Vector3(0, 0, 0));
scene.add(camera);

var light = new THREE.DirectionalLight(0xffffff, 1);
light.position.set(15, 10, 0);
scene.add(light);
light = new THREE.DirectionalLight(0xeaf9fe, 1, 500);
light.position.set(-10, -16, -10);
scene.add(light);
light = new THREE.AmbientLight(0x002959);
scene.add(light);



var points = [];
var NUMSIDES = 10;
function makePoint(i, r, y) {
  var a = i * 2 * Math.PI / NUMSIDES;
  return new THREE.Vector3(r * Math.cos(a), y, r * Math.sin(a));
}
for (var i = 0; i < NUMSIDES; i++) {
  points.push(makePoint(i, 2, 2));
  points.push(makePoint(i + 0.5, 2.5, 1.5));
  points.push(makePoint(i, 3, 1));
//points.push(makePoint(i + 0.5, 2, -2));
  points.push(makePoint(i, 1, -3));
}
points.push(makePoint(0, 0, -5));
var geometry = new THREE.ConvexGeometry(points);



//var material = new THREE.MeshPhongMaterial({
//	map: THREE.ImageUtils.loadTexture('./images/timg.jpg')
//});

var backmat = new THREE.MeshPhysicalMaterial({
  color: 0xfffffff,
  side: THREE.BackSide,
  flatShading: true
});
var frontmat = new THREE.MeshPhysicalMaterial({
  color: 0xfffffff,
  side: THREE.FrontSide,
  flatShading: true,
  transparent: true,
  opacity: 0.9
});
var mesh = new THREE.Mesh(geometry, frontmat);
mesh.position.set(0, 0, 0);
scene.add(mesh);
var m2 = new THREE.Mesh(geometry, backmat );
mesh.add(m2);

var lt = 0;
function update(t) {
  requestAnimationFrame(update);
  if (lt != 0) {
    var dt = (t - lt) / 1000;
    mesh.rotation.set(0, mesh.rotation.y + dt, 0);
    renderer.render(scene, camera);
  }
  lt = t;
}
update(0);