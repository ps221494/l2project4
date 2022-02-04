using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Windows;
using Login.Models;

namespace Login
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private ProjectDB _usersdb = new ProjectDB();
        public MainWindow()
        {
            InitializeComponent();
            DataContext = this;
        }
        private void TextBox_GotFocus(object sender, RoutedEventArgs e)
        {
            TxtUserName.Text = "";
        }

        private void PasswordBox_GotFocus(object sender, RoutedEventArgs e)
        {
            txtPassword.Password = "";
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            List<User_Roles> users = new List<User_Roles>();
            users = _usersdb.GetUsers();
            string name = TxtUserName.Text;
            try
            {


                for (int i = 0; i < users.Count; i++)
                {
                    if (users[i].Name == name)
                    {
                        adminwindow win = new adminwindow();
                        bereidingwindow winbereiding = new bereidingwindow();
                        bezorgwindow winbezorgin = new bezorgwindow();
                        string password;
                        string password1 = "$2a$";
                        string password2;
                        string password3 = users[i].password;
                        password2 = password3.Substring(4, password3.Length - 4);
                        password = password1 + password2;

                        bool Correct = BCrypt.Net.BCrypt.Verify(txtPassword.Password, password);
                        if (Correct == true)
                        {
                            switch (users[i].RoleName)
                            {
                                case "balie":
                                case "bereiding":
                                    MessageBox.Show("welkom " + name);
                                    winbereiding.Show();
                                    this.Close();
                                    break;
                                case "management":
                                case "admin":
                                    MessageBox.Show("welkom " + name);
                                    win.Show();
                                    this.Close();

                                    break;
                                default:
                                    break;
                            }
                        }
                        else
                        {
                            MessageBox.Show("Password is incorrect!!");
                        }

                    }

                }
            }
            catch (Exception)
            {
                MessageBox.Show("Database connection. There is somthing from with your database connection!!");
            }
        }
    }
}
