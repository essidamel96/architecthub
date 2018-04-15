let scene, camera, renderer, cube, controls;

        function init() {
            scene = new THREE.Scene(); //créer une scène
            scene.background = new THREE.Color(0xffffff); //donner la couleur blanche à la scène
            renderer = new THREE.WebGLRenderer({ //création du render qui permet d'afficher la scène
                antialias: true
            });
            renderer.setPixelRatio(window.devicePixelRatio);
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.gammaOutput = true;
            renderer.physicallyCorrectLights = true;
            document.getElementById("viewer").appendChild(renderer.domElement);

            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000); //création de la camera. Elle indique la façon et l'endroit d'ou la scène sera regardée
            camera.position.set(-1.8, 0.9, -2.7); //définir la position de camera
            controls = new THREE.OrbitControls(camera); //permet de se délpacer autour de l'objet et de faire des zoomin et zoomout
            controls.target.set(0, -0.2, -0.2);
            controls.update();
        }

        
        function generate_cube() {
            var geometry = new THREE.BoxGeometry(1, 1, 1); //forme de l'objet(taille et aspect)
            var material = new THREE.MeshBasicMaterial({ //texture de l'objet
                color: 0x00ff00,
                wireframe: true,
            });
        
            cube = new THREE.Mesh(geometry, material); //creation d'un cube
            scene.add(cube); // ajouter le cube à la scène
        }

        function upload_gltf() {
            let url = document.getElementById("viewer").dataset.src;
            console.log("File url ", url);
            const loader = new THREE.GLTFLoader(); //chargement d'un objet au format GLTF
            loader.load(
                '/files/mech_drone/scene.gltf',
                // url,
                function(gltf) {
                    scene.add(gltf.scene);
                }
            );
        }

        function addLight(shadows = true) {
        //création d'une lumière ambiante pour éclairer globalement notre scène
            var ambient = new THREE.AmbientLight(0x222222);
            scene.add(ambient);
        //création d'une lumière directionnelle pour lui donner un effet de rayon solaire
            var directionalLight = new THREE.DirectionalLight(0xdddddd, 4);
            directionalLight.position.set(0, 0, -1).normalize();
            scene.add(directionalLight);

            spot1 = new THREE.SpotLight(0xffffff, 1);
            spot1.position.set(10, 20, 10);
            spot1.angle = 0.25;
            spot1.penumbra = 0.75;

            if (shadows) {

                spot1.castShadow = true;
                spot1.shadow.bias = 0.0001;
                spot1.shadow.mapSize.width = 2048;
                spot1.shadow.mapSize.height = 2048;

                renderer.shadowMap.enabled = true;
                renderer.shadowMap.type = THREE.PCFSoftShadowMap;
            }
        }

        function addGround() {
            var groundMaterial = new THREE.MeshPhongMaterial({
                color: 0xFFFFFF
            });
            var ground = new THREE.Mesh(new THREE.PlaneBufferGeometry(512, 512), groundMaterial);
            ground.receiveShadow = true;
          /*
            if (sceneInfo.groundPos) {
                ground.position.copy(sceneInfo.groundPos);
            } else {
            */
                ground.position.z = -70;
                ground.position.y = -70;
            //}
            ground.rotation.x = -Math.PI / 2;
            scene.add(ground);
        }
        // ajouter une animation
        function animate() {
            requestAnimationFrame(animate);//permet d’optimiser les animations, d’arrêter l’animation si l’onglet est inactif et permet de conserver la batterie
            cube.rotation.x += 0.01;
            cube.rotation.y += 0.01;
            renderer.render(scene, camera); //appel de la méthode render pour afficher la scène
        }
//utilisation d'une fonction jQuery
 $(function() {       
        init();
        generate_cube();
        animate();
        upload_gltf();
        addLight();
        addGround();//
 });