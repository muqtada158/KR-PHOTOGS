<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a Square customer profile in the Customer Directory of a Square seller.
 */
class Customer implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var Card[]|null
     */
    private $cards;

    /**
     * @var string|null
     */
    private $givenName;

    /**
     * @var string|null
     */
    private $familyName;

    /**
     * @var string|null
     */
    private $nickname;

    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $birthday;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var CustomerPreferences|null
     */
    private $preferences;

    /**
     * @var string|null
     */
    private $creationSource;

    /**
     * @var string[]|null
     */
    private $groupIds;

    /**
     * @var string[]|null
     */
    private $segmentIds;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var CustomerTaxIds|null
     */
    private $taxIds;

    /**
     * Returns Id.
     * A unique Square-assigned ID for the customer profile.
     *
     * If you need this ID for an API request, use the ID returned when you created the customer profile or
     * call the [SearchCustomers]($e/Customers/SearchCustomers)
     * or [ListCustomers]($e/Customers/ListCustomers) endpoint.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     * A unique Square-assigned ID for the customer profile.
     *
     * If you need this ID for an API request, use the ID returned when you created the customer profile or
     * call the [SearchCustomers]($e/Customers/SearchCustomers)
     * or [ListCustomers]($e/Customers/ListCustomers) endpoint.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Created At.
     * The timestamp when the customer profile was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The timestamp when the customer profile was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     * The timestamp when the customer profile was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     * The timestamp when the customer profile was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Cards.
     * Payment details of the credit, debit, and gift cards stored on file for the customer profile.
     *
     * DEPRECATED at version 2021-06-16. Replaced by calling [ListCards]($e/Cards/ListCards) (for credit
     * and debit cards on file)
     * or [ListGiftCards]($e/GiftCards/ListGiftCards) (for gift cards on file) and including the
     * `customer_id` query parameter.
     * For more information, see [Migration notes](https://developer.squareup.com/docs/customers-api/what-
     * it-does#migrate-customer-cards).
     *
     * @return Card[]|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }

    /**
     * Sets Cards.
     * Payment details of the credit, debit, and gift cards stored on file for the customer profile.
     *
     * DEPRECATED at version 2021-06-16. Replaced by calling [ListCards]($e/Cards/ListCards) (for credit
     * and debit cards on file)
     * or [ListGiftCards]($e/GiftCards/ListGiftCards) (for gift cards on file) and including the
     * `customer_id` query parameter.
     * For more information, see [Migration notes](https://developer.squareup.com/docs/customers-api/what-
     * it-does#migrate-customer-cards).
     *
     * @maps cards
     *
     * @param Card[]|null $cards
     */
    public function setCards(?array $cards): void
    {
        $this->cards = $cards;
    }

    /**
     * Returns Given Name.
     * The given name (that is, the first name) associated with the customer profile.
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     * The given name (that is, the first name) associated with the customer profile.
     *
     * @maps given_name
     */
    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * Returns Family Name.
     * The family name (that is, the last name) associated with the customer profile.
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     * The family name (that is, the last name) associated with the customer profile.
     *
     * @maps family_name
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Nickname.
     * A nickname for the customer profile.
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * Sets Nickname.
     * A nickname for the customer profile.
     *
     * @maps nickname
     */
    public function setNickname(?string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * Returns Company Name.
     * A business name associated with the customer profile.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Sets Company Name.
     * A business name associated with the customer profile.
     *
     * @maps company_name
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * Returns Email Address.
     * The email address associated with the customer profile.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     * The email address associated with the customer profile.
     *
     * @maps email_address
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Address.
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     *
     * @maps address
     */
    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Phone Number.
     * The phone number associated with the customer profile. A phone number can contain 9–16 digits, with
     * an optional `+` prefix.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     * The phone number associated with the customer profile. A phone number can contain 9–16 digits, with
     * an optional `+` prefix.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Birthday.
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * Sets Birthday.
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     *
     * @maps birthday
     */
    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Returns Reference Id.
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Note.
     * A custom note associated with the customer profile.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     * A custom note associated with the customer profile.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Preferences.
     * Represents communication preferences for the customer profile.
     */
    public function getPreferences(): ?CustomerPreferences
    {
        return $this->preferences;
    }

    /**
     * Sets Preferences.
     * Represents communication preferences for the customer profile.
     *
     * @maps preferences
     */
    public function setPreferences(?CustomerPreferences $preferences): void
    {
        $this->preferences = $preferences;
    }

    /**
     * Returns Creation Source.
     * Indicates the method used to create the customer profile.
     */
    public function getCreationSource(): ?string
    {
        return $this->creationSource;
    }

    /**
     * Sets Creation Source.
     * Indicates the method used to create the customer profile.
     *
     * @maps creation_source
     * @factory \Square\Models\CustomerCreationSource::checkValue
     */
    public function setCreationSource(?string $creationSource): void
    {
        $this->creationSource = $creationSource;
    }

    /**
     * Returns Group Ids.
     * The IDs of customer groups the customer belongs to.
     *
     * @return string[]|null
     */
    public function getGroupIds(): ?array
    {
        return $this->groupIds;
    }

    /**
     * Sets Group Ids.
     * The IDs of customer groups the customer belongs to.
     *
     * @maps group_ids
     *
     * @param string[]|null $groupIds
     */
    public function setGroupIds(?array $groupIds): void
    {
        $this->groupIds = $groupIds;
    }

    /**
     * Returns Segment Ids.
     * The IDs of segments the customer belongs to.
     *
     * @return string[]|null
     */
    public function getSegmentIds(): ?array
    {
        return $this->segmentIds;
    }

    /**
     * Sets Segment Ids.
     * The IDs of segments the customer belongs to.
     *
     * @maps segment_ids
     *
     * @param string[]|null $segmentIds
     */
    public function setSegmentIds(?array $segmentIds): void
    {
        $this->segmentIds = $segmentIds;
    }

    /**
     * Returns Version.
     * The Square-assigned version number of the customer profile. The version number is incremented each
     * time an update is committed to the customer profile, except for changes to customer segment
     * membership and cards on file.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     * The Square-assigned version number of the customer profile. The version number is incremented each
     * time an update is committed to the customer profile, except for changes to customer segment
     * membership and cards on file.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Tax Ids.
     * Represents the tax ID associated with a [customer profile]($m/Customer). The corresponding `tax_ids`
     * field is available only for customers of sellers in EU countries or the United Kingdom.
     * For more information, see [Customer tax IDs](https://developer.squareup.com/docs/customers-api/what-
     * it-does#customer-tax-ids).
     */
    public function getTaxIds(): ?CustomerTaxIds
    {
        return $this->taxIds;
    }

    /**
     * Sets Tax Ids.
     * Represents the tax ID associated with a [customer profile]($m/Customer). The corresponding `tax_ids`
     * field is available only for customers of sellers in EU countries or the United Kingdom.
     * For more information, see [Customer tax IDs](https://developer.squareup.com/docs/customers-api/what-
     * it-does#customer-tax-ids).
     *
     * @maps tax_ids
     */
    public function setTaxIds(?CustomerTaxIds $taxIds): void
    {
        $this->taxIds = $taxIds;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']              = $this->id;
        }
        if (isset($this->createdAt)) {
            $json['created_at']      = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']      = $this->updatedAt;
        }
        if (isset($this->cards)) {
            $json['cards']           = $this->cards;
        }
        if (isset($this->givenName)) {
            $json['given_name']      = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']     = $this->familyName;
        }
        if (isset($this->nickname)) {
            $json['nickname']        = $this->nickname;
        }
        if (isset($this->companyName)) {
            $json['company_name']    = $this->companyName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address']   = $this->emailAddress;
        }
        if (isset($this->address)) {
            $json['address']         = $this->address;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']    = $this->phoneNumber;
        }
        if (isset($this->birthday)) {
            $json['birthday']        = $this->birthday;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']    = $this->referenceId;
        }
        if (isset($this->note)) {
            $json['note']            = $this->note;
        }
        if (isset($this->preferences)) {
            $json['preferences']     = $this->preferences;
        }
        if (isset($this->creationSource)) {
            $json['creation_source'] = CustomerCreationSource::checkValue($this->creationSource);
        }
        if (isset($this->groupIds)) {
            $json['group_ids']       = $this->groupIds;
        }
        if (isset($this->segmentIds)) {
            $json['segment_ids']     = $this->segmentIds;
        }
        if (isset($this->version)) {
            $json['version']         = $this->version;
        }
        if (isset($this->taxIds)) {
            $json['tax_ids']         = $this->taxIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
