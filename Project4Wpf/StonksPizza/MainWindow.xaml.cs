using StonksPizza.Models;
using System.Collections.Generic;
using System.Windows;

namespace StonksPizza
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public Project4DB db = new Project4DB();

        public MainWindow()
        {
            InitializeComponent();
        }

        private void TextBox_GotFocus(object sender, RoutedEventArgs e)
        {
            txtName.Text = "";
        }

        private void PasswordBox_GotFocus(object sender, RoutedEventArgs e)
        {
            txtPassword.Password = "";
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            List<Users_Roles> users = new List<Users_Roles>();
            foreach (Users_Roles users_ in db.GetAllUsers())
            {
                if (users_.Name == txtName.Text)
                {
                    MessageBox.Show("Succes");
                }
            }
            /*bool logout = true;
            while (logout)
            {
                if (0> 1)
                {
                    string hash = "$2a$";
                    string passwordHash = users[i].Password;
                    string sub = passwordHash.Substring(4, passwordHash.Length - 4);
                    string password = hash + sub;
                    bool Correct = BCrypt.Net.BCrypt.Verify(txtPassword.Password, password);
                    if (Correct)
                    {
                        MessageBox.Show("Succes");
                        logout = false;
                        return;
                    }
                    else
                    {
                        MessageBox.Show("Password Error");
                        break;
                    }
                }
                else
                {
                    MessageBox.Show("User name Error!!");
                    return;
                }
             }*/
        }
    }
}
