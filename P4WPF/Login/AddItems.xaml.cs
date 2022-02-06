using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Login.Models;
using System.Runtime.CompilerServices;
using System.Collections.ObjectModel;
using System.ComponentModel;

namespace Login
{
    /// <summary>
    /// Interaction logic for AddItems.xaml
    /// </summary>
    public partial class AddItems : Window
    {
        private ProjectDB _db = new ProjectDB();
        public AddItems()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            //this is gonna be tricky to do without any old projects open haha
            string Firstname = TXTFirstName.Text;
            string Lastname = TXTLastName.Text;
            string Adress = TXTAdress.Text;
            string PhoneNumber = TXTPhoneNumber.Text;
            string Zipcode = TXTZipCode.Text;
            string City = TXTCity.Text;
            string Country = TXTCountry.Text;
            string PersonalEmail = TXTPersonal.Text;
            string BSN = TXTBsn.Text;

            if (!_db.CreateEmployee(Firstname, Lastname, Adress, PhoneNumber, Zipcode, City, Country, PersonalEmail, BSN))
            {
                MessageBox.Show("error for creating a employee");
            }
            else
            {
                this.Close();
            }
        }
    }
}
