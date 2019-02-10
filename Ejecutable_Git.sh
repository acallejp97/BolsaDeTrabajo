echo 'Inserte su usuario'
read usuario

echo 'Inserte su correo'
read correo


git config --global user.email $correo
git config --global user.name $usuario

git add .

echo 'Introduce el mensaje del Commit:'
read commitMessage

git commit -m "$commitMessage"

git pull

git push origin master

echo "Finalizado, pulse cualquier tecla"
read
