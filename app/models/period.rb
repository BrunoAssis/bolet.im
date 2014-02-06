class Period < ActiveRecord::Base
  belongs_to :school
  belongs_to :school_year

  validates :school, presence: true
  validates :school_year, presence: true
  validates :name, presence: true

  def to_s
    "#{self.school.name} - #{self.school_year.year} - #{self.name}"
  end
end
