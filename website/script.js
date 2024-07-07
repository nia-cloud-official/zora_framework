// Create the scene, camera, and renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({
    canvas: document.getElementById('canvas-container'),
    antialias: true
});
renderer.setSize(window.innerWidth, window.innerHeight);

// Create parallel 3D planes
const planeGeometry = new THREE.PlaneGeometry(100, 100);
const planeMaterial = new THREE.MeshBasicMaterial({ color: 0xffffff, opacity: 0.5, transparent: true });
const planes = [];
for (let i = 0; i < 10; i++) {
    const plane = new THREE.Mesh(planeGeometry, planeMaterial);
    plane.position.z = i * 10;
    planes.push(plane);
    scene.add(plane);
}

// Create 3D text
const textGeometry = new THREE.TextGeometry('Parallel 3D Website', {
    font: 'bold 24px Arial',
    height: 1,
    curveSegments: 12,
    bevelEnabled: true,
    bevelThickness: 1,
    bevelSize: 1
});
const textMaterial = new THREE.MeshBasicMaterial({ color: 0xffffff });
const textMesh = new THREE.Mesh(textGeometry, textMaterial);
textMesh.position.z = 50;
scene.add(textMesh);

// Create 3D cube
const cubeGeometry = new THREE.BoxGeometry(10, 10, 10);
const cubeMaterial = new THREE.MeshBasicMaterial({ color: 0xff0000 });
const cubeMesh = new THREE.Mesh(cubeGeometry, cubeMaterial);
cubeMesh.position.z = 20;
scene.add(cubeMesh);

// Animate the scene
function animate() {
    requestAnimationFrame(animate);
    planes.forEach((plane, index) => {
        plane.rotation.y += 0.01;
        plane.position.z += Math.sin(index * 0.1) * 0.1;
    });
    textMesh.rotation.y += 0.01;
    cubeMesh.rotation.y += 0.01;
    renderer.render(scene, camera);
}
animate();