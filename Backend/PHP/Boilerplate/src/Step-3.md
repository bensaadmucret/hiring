Step 3
For code quality, you can use some tools : which one and why (in a few words) ?
you can consider to setup a ci/cd process : describe the necessary actions in a few words

Voici une liste de quelques outils pour améliorer la qualité du code :

PHP CodeSniffer : pour vérifier la conformité du code aux standards de codage et appliquer des règles de codage cohérentes.
PHPUnit : pour écrire des tests unitaires et assurer la qualité du code en détectant les erreurs de logique.
PHPStan : pour détecter les erreurs potentielles dans le code, telles que les erreurs de type, les appels de méthode invalides, les propriétés inaccessibles, etc.
ESLint : pour les projets utilisant du JavaScript, pour détecter les erreurs de syntaxe et appliquer des règles de codage cohérentes.


Pour mettre en place un processus CI/CD, voici quelques étapes :

Configurer un outil d'intégration continue (CI) (comme Travis CI, CircleCI, GitLab CI/CD, etc.) pour exécuter automatiquement des tests unitaires, PHP CodeSniffer, PHPStan, et ESLint lorsqu'un nouveau code est poussé sur le dépôt Git.
Configurer un outil de déploiement continu (CD) (comme Deployer, Ansible, etc.) pour déployer automatiquement le code sur les serveurs de production une fois que les tests et la vérification de code ont été passés avec succès.
Ajouter des rapports de couverture de code, des mesures de qualité du code, des notifications d'erreur et des notifications de déploiement à l'ensemble du processus.