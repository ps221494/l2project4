namespace Login.Models
{
    public class Employee
    {
        private ulong id;
        public ulong Id
        {
            get { return id; }
            set { id = value; }
        }

        private string first_name;

        public string FirstName
        {
            get { return first_name; }
            set { first_name = value; }
        }
        private string last_name;
        public string LastName
        {
            get { return last_name; }
            set { last_name = value; }
        }
        private string adress;
        public string Adress
        {
            get { return adress; }
            set { adress = value; }
        }

        private string phone;
        public string Phone
        {
            get { return phone; }
            set { phone = value; }
        }

        private string zipcode;
        public string Zipcode
        {
            get { return zipcode; }
            set { zipcode = value; }
        }

        private string city;
        public string City
        {
            get { return city; }
            set { city = value; }
        }
        private string country;
        public string Country
        {
            get { return country; }
            set { country = value; }
        }
        private string pemail;
        public string Pemail
        {
            get { return pemail; }
            set { pemail = value; }
        }
  

        private string bsn;
        public string Bsn
        {
            get { return bsn; }
            set { bsn = value; }
        }

    }
}
