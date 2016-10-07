cd /etc/pki/tls/certs

echo "make server.key"
make server.key
openssl rsa -in server.key -out server.key

echo "make server.csr"
make server.csr
openssl x509 -in server.csr -out server.crt -req -signkey server.key -days 3650

cd /root/shell
